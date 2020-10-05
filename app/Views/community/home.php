<style>
/* .custom-card {
    min-height: 300px;
    max-height: 300px;

} */

.card-img-top {
    max-height: 160px;
    min-height: 160px;
    border-radius: 0%;
    object-fit: cover;
}

.modal-backdrop {
    z-index: 1040 !important;
    display: none;
}

.modal-dialog {
    margin: 80px auto;
    z-index: 1100 !important;
}
</style>

<div class="main mt-0 w-dt ndDT" style="margin-top: 6%;">
    <div class="row">
    
        <?php include('app/Views/templates/main-sidebar.php')?>
        <!-- Community Feed-->
        <div class="community-feed">
            <div id="carouselExampleIndicators" class="carousel slide col-12 px-0" data-ride="carousel"
                data-interval="100000">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active ">
                        <img class="d-block w-100 " src="<?= base_url(); ?>/public/user/assets/img/profile_city.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h2 class="my-0">
                                Test Community1
                            </h2>
                            <div class="col-sm-12 pl-0 ">
                                <div class="row align-items-center mx-0">

                                    <i class="p-1 fa fa-users pr-2 "></i>
                                    <h4>5.2K</h4>
                                    <i class="material-icons px-2">leaderboard</i>
                                    <h4>1</h4>
                                </div>
                            </div>
                            <p class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum totam
                                maiores
                                magnam in delectus officia nam, sequi consequuntur, enim tempore eaque? Consequatur,
                                repellat
                                quia. Id incidunt beatae exercitationem libero corporis!</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="public/user/assets/img/profile_city.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h2 class="my-0">
                                Test Community1
                            </h2>
                            <div class="col-sm-12 pl-0 ">
                                <div class="row align-items-center mx-0">

                                    <i class="p-1 fa fa-users pr-2 "></i>
                                    <h4>5.2K</h4>
                                    <i class="material-icons px-2">leaderboard</i>
                                    <h4>1</h4>
                                </div>
                            </div>
                            <p class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum totam
                                maiores
                                magnam in delectus officia nam, sequi consequuntur, enim tempore eaque? Consequatur,
                                repellat
                                quia. Id incidunt beatae exercitationem libero corporis!</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="public/user/assets/img/profile_city.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h2 class="my-0">
                                Test Community1
                            </h2>
                            <div class="col-sm-12 pl-0 ">
                                <div class="row align-items-center mx-0">

                                    <i class="p-1 fa fa-users pr-2 "></i>
                                    <h4>5.2K</h4>
                                    <i class="material-icons px-2">leaderboard</i>
                                    <h4>1</h4>
                                </div>
                            </div>
                            <p class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum totam
                                maiores
                                magnam in delectus officia nam, sequi consequuntur, enim tempore eaque? Consequatur,
                                repellat
                                quia. Id incidunt beatae exercitationem libero corporis!</p>

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="container rounded-0 px-0">

                
                <div class="team px-3">      
                    <div class="tab-pane active show" id="recomCommunities">
                        <div class="team px-3">

                            <div class="row">

                                <?php foreach ($recommended_community as $key => $value) : ?>

                                <div class="col-lg-4">
                                    <div class="team-player">

                                        <div class="card h-100 custom-card ">
                                        <div class="row m-0 align-items-center"
                                                style="background-color: <?= $value->color; ?>">
                                            
                                                <div class="col-10 community-title  ">
                                                    <h6>
                                                        <a href="<?= base_url(); ?>/play/<?= $value->slug ?>/<?= $value->id;  ?>/<?= $value->subclass_id ?>"
                                                            style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 20) ?>
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div class="col-1 ">
                                                    <a href="#recommended<?= $key ?>" data-toggle="modal"
                                                        data-target="#recommended<?= $key ?>"><i
                                                            class="fa fa-info-circle p-0" style="float:left;"></i></a>
                                                </div>
                                            </div>

                                            <div class="view overlay">
                                                <img class="card-img-top rounded-0"
                                                    src="public/admin/uploads/community/<?= $value->name ?>"
                                                    alt="Card image cap">
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <p class="text-muted mx-3 mt-2"><?= character_limiter($value->content, 70); ?></p>
                
                                            <div class="card-footer justify-content-center p-0 my-2">
                                                <div class="togglebutton d-flex w-100">

                                                    <div class="float-right col-sm-8 ">
                                                        <?php if($value->community_type == '0'): ?>
                                                        <span class="badge badge-pill badge-secondary">Public</span>
                                                        <?php else: ?>
                                                        <span class="badge badge-pill badge-dark">Private</span>
                                                        <?php endif; ?>
                                                        <!-- <php if($value->status == '0'): ?>
                                    <span class="badge badge-pill badge-success">Pending</span>
                                    <php elseif($value->status == '1'): ?>
                                    <span class="badge badge-pill badge-primary">Joined</span>
                                    <php elseif($value->status == '2'): ?>
                                    <span class="badge badge-pill badge-info">AC</span>
                                    <php elseif($value->status == '3'): ?>
                                    <span class="badge badge-pill badge-danger">Banned</span>
                                    <php endif; ?> -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="recommended<?= $key ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary py-3 text-white align-items-center">
                                                <h5 class="modal-title m-0">
                                                    <?= character_limiter($value->title, 20) ?>
                                                </h5>
                                                <button type="button"
                                                    class="close bg-danger text-white btn-link p-2 rounded-circle"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">clear</i>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <!-- <h3>Created by: <strong><?= $value->nickname ?></strong></h3> -->
                                                    <!-- <p>Status: <strong>
                                        <php if($value->status == '0'): ?>
                                        Pending
                                        <php elseif($value->status == '1'): ?>
                                        Joined
                                        <php elseif($value->status == '2'): ?>
                                        AC
                                        <php elseif($value->status == '3'): ?>
                                        Banned
                                        <php endif; ?> -->
                                                    <!-- </strong></p>
                                                    <p>Type: <strong>
                                                            <?php if($value->community_type == '0'): ?>
                                                            Public
                                                            <?php else: ?>
                                                            Private
                                                            <?php endif; ?>
                                                        </strong></p> -->

                                                        <p>Date Created: <strong><?= date("F j, Y g:i A",strtotime($value->created_at)) ?></strong></p>
                                                </div>
                                                </hr><br>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <ul class="pagination pagination-primary mx-auto">
            <li class="page-item"><a href="javascript:void(0);" class="page-link"> prev</a></li>
            <li class="active page-item"><a href="javascript:void(0);" class="page-link">1</a></li>
    
            <li class="page-item"><a href="javascript:void(0);" class="page-link">next </a></li>
        </ul> -->
            </div>
        </div>

    </div>
</div>

</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary py-3 align-items-center">
                <h5 class="modal-title w-100 fw600 m-0 text-white">Create Community</h5>
                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle"
                    data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">

                <form class="contact-form" action="<?= base_url(); ?>/user_save_community" method="post"
                    accept-charset="utf-8" enctype="multipart/form-data">

                    <div class="form-group col-sm-12">
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="text" name="community_slug" class="form-control" placeholder="Community URL" minlength="4" maxlength="20" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="content" class="form-control" cols="5" rows="5"
                            placeholder="Details" required></textarea>
                    </div>
                    <div class="d-flex align-items-center">
<!-- 
                        <div class="col-sm-6">
                            <label for="">Community Photo</label>
                            <input type="file" name="file" class="text-center center-block file-upload form-control"
                                accept=".png, .jpg, .jpeg">
                        </div> -->
                        <div class="col-12" style="display:none">
                            <div class="togglebutton d-flex align-items-center">
                                <label>
                                    <input type="checkbox" name="community_type"
                                        <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
                                    <span class="toggle"></span>
                                </label>
                                <h6> Private Community</h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- <div class="d-flex align-items-center">
                        <div class="col-sm-6 d-flex">
                          <div class="col-sm-8 pl-0">

                            <label for="color">Select your theme color:</label>
                          </div>
                          <div class="col-sm-4">
                            <input type="hidden" name="color" value="#FFFFFF" class="myField">
                        </div>
                                </div>
                                <div class="col-sm-6 d-flex">
                          <div class="col-sm-8 pl-0">

                          <label for="color">Select your text color:</label>
                          </div>
                            <div class="col-sm-4">
                                <input type="color" name="text_color" value="#555555">
                            </div>
                        </div>
                    </div> -->
                    <!-- <hr> -->
                    <!-- <div class="form-group row col-sm-12">
                        <div class="col-lg-6">
                            <label>Upvote Name</label>
                            <input type="text" name="upvote" class="form-control">
                        </div>

                        <div class="col-lg-6">
                            <label>Devote Name</label>
                            <input type="text" name="devote" class="form-control">
                        </div>

                    </div> -->
                    <!-- <div class="form-group row col-sm-12"> 
                        <div class="col-lg-12">
                            <label>Join In Question (set question when user join in)</label>
                            <input type="text" name="questions" class="form-control">
                        </div>
                    </div> -->

                    <button type="submit" class="btn btn-primary float-right">CREATE</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!--  End Modal -->

<script type="text/javascript">
function myFunction() {
    var input, filter, cards, cardContainer, h5, title, i;
    input = document.getElementById("myFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("myItems");
    cards = cardContainer.getElementsByClassName("card");
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".card-body h5.card-title");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}

$(".myField").simpleSwatchPicker();
// $("#myField1").simpleSwatchPicker();
// $("#myField2").simpleSwatchPicker();
$('document').ready(function() {
    $("#btnSubmit").attr("disabled", true);

});

</script>