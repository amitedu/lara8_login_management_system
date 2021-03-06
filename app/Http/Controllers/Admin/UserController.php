<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is-admin');

        return view('admin.users.index', ['users' => User::paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is-admin');

        return view('admin.users.create', ['roles' => Role::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(StoreUserRequest $request)
    {
        // This code is for without using Fortify Actions
//        $validateData = $request->validated();
//
//        $user = User::create($validateData);

        $this->authorize('is-admin');

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->except(['_token', 'roles']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only('email'));

        $request->session()->flash('success', 'User added successful');

        return redirect(route('admin.users.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function edit(int $id)
    {
        $this->authorize('is-admin');

        return view('admin.users.edit', [
            'roles' => Role::all(),
            'user' => User::find($id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->authorize('is-admin');

        $user = User::find($id);
        if ( ! $user) {
            $request->session()->flash('failed', 'User update failed');

            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));

        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'User update successful');

        return redirect(route('admin.users.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, int $id)
    {
        $this->authorize('is-admin');

        if (User::destroy($id)) {
            $request->session()->flash('success', 'The user deleted successfully');
        }

        return redirect(route('admin.users.index'));
    }

}
