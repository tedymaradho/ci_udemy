<?= $this->extend('layout/v_template') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#product_modal">Tambah
            Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-sm-12">

                <table class="table table-sm table-striped table-bordered" id="product_table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('pages/products/modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    $(document).ready(function () {
        $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?= site_url('products/getDataTables') ?>",
            columnDefs: [
                {
                    orderable: false, targets: 0
                },
                {
                    orderable: false, targets: 4
                },
            ],
            order: [
                [1, 'desc']
            ]
        });

        $('#logout').on('click', function () {
            $.ajax({
                url: "<?= site_url('home/cekLogout') ?>",
                success: function (res) {
                    window.location.href = "<?= site_url() ?>";
                }
            })
        });
    });
</script>

<?= $this->endSection() ?>