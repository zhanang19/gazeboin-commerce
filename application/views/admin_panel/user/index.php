<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 05/06/2019
 * Time: 18:04
 * Project: e-commerce
 */
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">group</i>
                            </div>
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                <a href="<?= base_url('admin/user/create') ?>" class="btn btn-sm btn-rose">Add user</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data-users" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['users'] as $key => $user) : ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td>
                                                <span class="badge badge-<?= $user['level'] === '1' ? 'success' : 'default' ?>"><?= $user['level'] === '1' ? 'Admin' : 'User' ?></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-<?= $user['status'] === '1' ? 'success' : 'danger' ?>"><?= $user['status'] === '1' ? 'Active' : 'Inactive' ?></span>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-just-icon btn-link btn-edit" href="<?= base_url('user/edit/1') ?>" title="Edit User">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger btn-just-icon btn-link btn-edit" href="<?= base_url('user/delete/1') ?>" title="Delete User">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#data-users').DataTable();
        });
    </script>