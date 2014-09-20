<?php
$reservs = Manager::getReserves();
?>
<div class='container-fluid'>
    <div class='row-fluid' id='content-wrapper'>
        <div class='span12'>
            <div class='row-fluid'>
                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                        <div class='title'>Reservation</div>
                    </div>
                    <div class='box-content box-no-padding'>
                        <div class='responsive-table'>
                            <div class='scrollable-area'>
                                <table class='table' style='margin-bottom:0;'>
                                    <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            E-mail
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Detail
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($reservs as $key=> $reserv){?>
                                    <tr>
                                        <td><?php echo $reserv['first_name']." ".$reserv['last_name'];?></td>
                                        <td><?php echo $reserv['email_address'];?></td>
                                        <td><?php echo $reserv['phone_number'];?></td>
                                        <td><a class="btn btn-info" href="?page=reserv_detail&id=<?php echo $reserv['id'];?>">detail</a></td>
                                        <td>
                                            <div class='text-right'>
                                                <a class='btn btn-danger btn-mini usr-remove' href='?page=remove_reserve&id=<?php echo $reserv['id'];?>'>
                                                    <i class='icon-remove'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    $('.usr-remove').click(function(e){
        if(!window.confirm("Are you sure?")){
            e.preventDefault();
        }
    });
});
</script>