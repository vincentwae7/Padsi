<?= $this->section('content') ?>
<?= $this->extend('layout/template') ?>

<div id="layoutSidenav_content" class="d-flex">
    <main class="w-100">
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengelolaan <?= $title ?></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List <?= $title ?>
                </div>
                <div class="card-body">
                    <a href="<?= route_to('tambah-user') ?>" class="btn btn-primary mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Data
                    </a>
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No_Hp</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_user as $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nama_user'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['phone'] ?></td>
                                    <td><?= $value['Role'] ?></td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning text-white" onclick="openEditModal(
                                            <?= $value['user_id'] ?>, 
                                            '<?= $value['nama_user'] ?>', 
                                            '<?= $value['email'] ?>', 
                                            '<?= $value['phone'] ?>', 
                                            '<?= $value['Role'] ?>')"
                                            data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="<?= route_to('delete-user') ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="user_id" value="<?= $value['user_id'] ?>">
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= route_to('update-user') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">

                    <!-- Nama User -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nama_user" type="text" placeholder="Nama User" name="nama_user" required />
                        <label for="nama_user">Nama User</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="Email Address" name="email" required />
                        <label for="email">Email Address</label>
                    </div>

                    <!-- No-Telp -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="text" placeholder="Nomor Telepon" name="phone" required />
                        <label for="phone">Nomor Telepon</label>
                    </div>

                    <!-- Role -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="role" name="role" required>
                            <option value="Waiter">Waiter</option>
                            <option value="Barista">Barista</option>
                            <option value="Manajer">Manajer</option>
                        </select>
                        <label for="role">Role</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to open the modal and bind data
    function openEditModal(userId, userName, userEmail, userPhone, userRole) {
        $('#user_id').val(userId);
        $('#nama_user').val(userName);
        $('#email').val(userEmail);
        $('#phone').val(userPhone);
        $('#role').val(userRole);
    }
</script>

<?= $this->endsection() ?>