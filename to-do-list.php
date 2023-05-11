<?php
include('get-to-do.php');
$works = getWork(); 
?>

<?php
if(count($works['data'])) {
    foreach($works['data'] as $work) {
?>

<div class="row my-3">
    <div class="col-sm-10">
        <?php
       echo $work['work_name'];
        ?>
    </div>
    <div class="col-sm-1">
        <a href="index.php?edit-work=<?php echo $work['id']; ?>" class="text-success text-decoration-none">
        <i class='fas fa-edit'></i>
       </a>
    </div>
    <div class="col-sm-1">
    <a href="index.php?delete-work=<?php echo $work['id']; ?>" class="text-danger text-decoration-none">
    <i class='fas fa-trash-alt'></i>

    </a>
    </div>
</div>
<hr>

<?php 
} 
}
?>