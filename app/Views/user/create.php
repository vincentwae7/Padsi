<?= $this->section('content') ?>
<?= $this->extend('layout/template') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container px-5 my-5">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengelolaan <?= $title ?></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tambah <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Form Data -->
                    <form action="<?= route_to('simpan-user') ?>" method="post" id="createUserForm">
                        <!-- Nama User -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="namaUser" type="text" placeholder="Nama User" name="nama_user" required />
                            <label for="namaUser">Nama User</label>
                            <div class="invalid-feedback" data-sb-feedback="namaUser:required">Nama User is required.</div>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" name="email" required />
                            <label for="emailAddress">Email Address</label>
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address is not valid.</div>
                        </div>

                        <!-- No-Telp -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nomorTelepon" type="text" placeholder="Nomor Telepon" name="phone" required />
                            <label for="nomorTelepon">Nomor Telepon</label>
                            <div class="invalid-feedback" data-sb-feedback="nomorTelepon:required">Nomor Telepon is required.</div>
                        </div>

                        <!-- Role -->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="role" name="Role" required>
                                <option value="Waiter">Waiter</option>
                                <option value="Barista">Barista</option>
                                <option value="Manajer">Manajer</option>
                            </select>
                            <label for="role">Role</label>
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endsection() ?>