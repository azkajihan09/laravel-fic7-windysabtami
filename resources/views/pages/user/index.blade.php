@extends('layouts.app')

@section('title', 'Posts')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Management</h1>

        </div>
        <div class="section-body">
            <h2 class="section-title">All User</h2>
            <p class="section-lead">
                You can manage all user, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users</h4>
                        </div>
                        <div class="card-body">

                            <div class="float-right">
                                <form method="Get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                    </tr>

                                    @foreach ($users as $index => $user)
                                    <tr>

                                        <td>{{ $index + $users->firstItem() }}</td>
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>{{ $user->phone }}</td>

                                        <td>
                                            <div
                                                class="badge @if ($user->email_verified_at != null) badge-primary @else badge-danger @endif">
                                                @if ($user->email_verified_at != null)
                                                Active
                                                @else
                                                Pending
                                                @endif

                                            </div>



                                        </td>
                                        <td>
                                            <div {{--
                                                class="badge {{ $user->role == 'admin' ? 'badge-primary'  : 'badge-dark' }}">
                                                --}}
                                                class="badge
                                                @if ($user->role == 'admin')
                                                badge-primary
                                                @elseif ($user->role == 'user')
                                                badge-warning
                                                @else
                                                badge-danger
                                                @endif">
                                                {{ $user->role }}
                                                </span>

                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ route('user.show', $user->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </td>


                                        <td>
                                            <a href="{{ route('user.show', $user->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>


                                        </td>
                                    </tr>
                                    @endforeach



                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $users->withQueryString()->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush