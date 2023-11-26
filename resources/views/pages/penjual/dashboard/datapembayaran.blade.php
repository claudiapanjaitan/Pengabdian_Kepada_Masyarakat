<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran Saya</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-heading">Data Order</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-hover">
                                <tr>
                                    <td>Order</td>
                                    <td>#<b><?php echo $data->order_number; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah transfer</td>
                                    <td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Transfer dari</td>
                                    <td><b><?php echo $payment->source->bank; ?> a.n <?php echo $payment->source->name; ?> (<?php echo $payment->source->number; ?>)</td>
                                </tr>
                                <tr>
                                    <td>Transfer ke</td>
                                    <td><b>
                                            <?php
                                            $transfer_to = $payment->transfer_to;
                                            $transfer_to = $banks[$transfer_to];

                                            ?>
                                            <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><b><?php echo get_payment_status($data->payment_status); ?></b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-heading">Bukti Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img alt="Pembayaran order #<?php echo $data->order_number; ?>" class="img img-fluid" style="padding: 0px 0px;" src="<?php echo base_url('assets/upload/payments/' . $data->picture_name); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>