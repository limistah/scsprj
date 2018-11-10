<?php
/**
 * courses.php for scs.
 * Created by: LIMISTAH
 * Date: 01-11-2017
 * Time: 9:03 AM
 */

prevent_d_access();
$title = "Courses";


if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    $action = get('action');
    $id = get('id');
    if( $action == 'delete') {
//        $db->delete('users', 'id = ?', array($id));
        $sql = "DELETE FROM users WHERE id = ?";
        $db->query($sql, array($id));
        success_flash('delete', 'User deleted successfully');
    } else if($action == 'block' || $action =='unblock' ) {
        $block = '1';
        if($action === 'block') {
            $block = '1';
            success_flash('block', 'User blocked successfully');
        } else if ($action === 'unblock') {
            $block = '0';
            success_flash('unblock', 'User unblocked successfully');
        }
        $db->update('users', array('blocked'=>$block), 'id = ?', array($id));
    } redirect(request_uri);
}

?>



<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $title ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <?php if($flash = get_flash('delete') ) { ?>
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <div class="alert alert-info text-center">
                    <?= $flash ?>
                </div>
            </div>
        <?php } else if($flash = get_flash('block')) {?>
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <div class="alert alert-info text-center">
                    <?= $flash ?>
                </div>
            </div>
        <?php } else if ($flash = get_flash('unblock')) { ?>
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <div class="alert alert-info text-center">
                    <?= $flash ?>
                </div>
            </div>
        <?php } ?>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <form method="post">
                    <table id="datatable2" class="table table-striped" style="border:1px solid #ccc;">

                        <thead>
                        <tr>

                            <th>Name
                            </th>
                            <th>Department
                            </th>
                            <th>Subjects </th>
                        </tr>
                        </thead>


                        <tbody>
                        <?php
                        $sql = "SELECT * FROM courses order BY name DESC";
                        $result=$db->query($sql)->fetch_assoc_all();

//                        var_dump($result); die();

                        foreach($result as $row) {
                            $row=array_map('stripcslashes',$row);
                            extract($row);
                            ?>

                            <tr>
                                <td>&nbsp; <?= ucwords(implode(' ',explode('_', $name))) ?></td>
                                <td>&nbsp; <?=ucwords($department)?></td>
                                <td>&nbsp; <?= ucwords(implode(' ', explode('_', implode(', ',explode(',', $subjects )))))?></<td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>



            </div>
        </div>
    </div>
</div>
