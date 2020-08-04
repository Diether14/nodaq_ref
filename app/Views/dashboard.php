<style>
    .custom-card {
        min-height: 300px;
        max-height: 300px;

    }

    .card-img-top {
        max-height: 180px;
        min-height: 180px;
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



<div class="main bg-light" style="margin-top: 6%;">
    <div class="container  mt-5 rounded-0 card">
        <div class="mx-auto mt-3">
            <ul class="nav nav-pills nav-pills-icons " role="tablist">

                <li class="nav-item">
                    <a class="nav-link p-4 active" href="#defCommunities" role="tab" data-toggle="tab">
                        Communities
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 " href="#recomCommunities" role="tab" data-toggle="tab">
                        Recommended
                    </a>
                </li>
            </ul>

        </div>

        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="defCommunities">
                <div class="team px-3">
 
                <div class="row">
                <!-- <div class="card col-sm-12 p-3">
                        <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for title..">
                    </div> -->

                </div>
                    <div class="row"  id="myItems">
                  
                        <?php foreach ($community_list as $key => $value) : ?>

                        <div class="col-md-3">
                            <div class="team-player">

                                <div class="card h-100 custom-card ">
                                    <div class="row m-0 align-items-center"
                                        style="background-color: <?= $value->color; ?>">
                                        <div class="col-1 p-0 m-0">
                                            <a href="#" data-toggle="modal" data-target="#anonymousModal"><i
                                                    class="fa fa-bars px-3" style="float:left;"></i></a>

                                        </div>
                                        <div class="col-10 p-0 m-0 text-center community-title  ">
                                            <h4 class="p-3 my-0  p-3 my-0">
                                                <!-- <a href="community-join/<= $value->id;  ?>"
                                                    style="color: <= $value->text_color; ?>"><= character_limiter($value->title, 18) ?>
                                                </a> -->
                                                <a  href="#"   data-toggle="modal"
                                                data-target="#anonymousModal<?= $key ?>"
                                                    style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 18) ?>
                                                </a>
                                            
                                            </h4>
                                        </div>
                                        <div class="col-1 p-0 m-0">
                                            <a href="#communityInfo<?= $key ?>" data-toggle="modal"
                                                data-target="#communityInfo<?= $key ?>"><i class="fa fa-info-circle p-0"
                                                    style="float:left;"></i></a>

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
                                    <!-- <div class="card-body">
                                <p class="card-description">
                                </p>
                              </div> -->
                                    <div class="card-footer justify-content-center p-0 my-3">
                                        <div class="togglebutton d-flex w-100">
                                            
                                            <div class="float-right col-sm-8 ">
                                                <?php if($value->community_type == '0'): ?>
                                                    <span class="badge badge-pill badge-secondary">Public</span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-dark">Private</span>
                                                <?php endif; ?>    
                                                <?php if($value->status == '0'): ?>
                                                <span class="badge badge-pill badge-success">Pending</span>
                                                <?php elseif($value->status == '1'): ?>
                                                <span class="badge badge-pill badge-primary">Joined</span>
                                                <?php elseif($value->status == '2'): ?>
                                                <span class="badge badge-pill badge-info">AC</span>
                                                <?php elseif($value->status == '3'): ?>
                                                <span class="badge badge-pill badge-danger">Banned</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-4 p-0">
                                                <label>
                                                    <i class=" fa fa-user-secret"></i>
                                                    <?php if($value->anounymous == '1'): ?>
                                                    <input type="checkbox" checked="" disabled>
                                                    <span class="toggle"></span>
                                                    <?php else: ?>
                                                    <input type="checkbox" disabled>
                                                    <span class="toggle"></span>
                                                    <?php endif; ?>
                                                </label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="communityInfo<?= $key ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary py-3 text-white align-items-center">
                                        <h5 class="modal-title m-0">
                                            <?= character_limiter($value->title, 18) ?>
                                        </h5>
                                        <button type="button"
                                            class="close bg-danger text-white btn-link p-2 rounded-circle"
                                            data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h3>Created by: <strong><?= $value->nickname ?></strong></h3>
                                            <p>Community Status: <strong>
                                                    <?php if($value->status == '0'): ?>
                                                    Pending
                                                    <?php elseif($value->status == '1'): ?>
                                                    Joined
                                                    <?php elseif($value->status == '2'): ?>
                                                    AC
                                                    <?php elseif($value->status == '3'): ?>
                                                    Banned
                                                    <?php endif; ?>
                                            </strong></p>
                                            <p>Type: <strong>
                                            <?php if($value->community_type == '0'): ?>
                                                   Public
                                                <?php else: ?>
                                                    Private
                                                <?php endif; ?>  
                                            </strong></p>
                                            
                                            <p>Created At: <strong><?= $value->created_at ?></strong></p>
                                        </div>
                                        </hr><br>
                                    </div>

                                </div>
                            </div>
                        </div>


                        
                        <!-- Classic Modal -->
                        <div class="modal fade" id="anonymousModal<?= $key ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Anonymous mode?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <form class="contact-form" action="<?= base_url(); ?>/update_anounymous" method="post">
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" name="mode"
                                                            <?= ($value->anounymous == '1' ? 'checked' : null) ?> >
                                                        <span class="toggle"></span>
                                                        Anonymous mode  
                                                    </label>

                                                    <input type="hidden" value="<?= $value->community_id ?>" name="community_id">
                                                    <input type="hidden" value="<?= $value->id ?>" name="id"> 
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-raised mt-3" id="btnSubmit">
                                                    Enter
                                                </button>
                                            </form>
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
            <div class="tab-pane " id="recomCommunities">
            <div class="team px-3">

            <div class="row">

            <?php foreach ($recommended_community as $key => $value) : ?>

            <div class="col-md-3">
                <div class="team-player">

                    <div class="card h-100 custom-card ">
                        <div class="row m-0 align-items-center"
                            style="background-color: <?= $value->color; ?>">
                            <div class="col-1 p-0 m-0">
                                <a href="#" data-toggle="modal" data-target="#anonymousModal"><i
                                        class="fa fa-bars px-3" style="float:left;"></i></a>
                            </div>
                            <div class="col-10 p-0 m-0 text-center community-title  ">
                                <h4 class="p-3 my-0  p-3 my-0">
                                    <a href="community-join/<?= $value->id;  ?>"
                                        style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 18) ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-1 p-0 m-0">
                                <a href="#recommended<?= $key ?>" data-toggle="modal"
                                    data-target="#recommended<?= $key ?>"><i class="fa fa-info-circle p-0"
                                        style="float:left;"></i></a>
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
                        <!-- <div class="card-body">
                    <p class="card-description">
                    </p>
                </div> -->
                        <div class="card-footer justify-content-center p-0 my-3">
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
                                <?= character_limiter($value->title, 18) ?>
                            </h5>
                            <button type="button"
                                class="close bg-danger text-white btn-link p-2 rounded-circle"
                                data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="text-center">
                                <h3>Created by: <strong><?= $value->nickname ?></strong></h3>
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
                                </strong></p>
                                <p>Type: <strong>
                                <?php if($value->community_type == '0'): ?>
                                    Public
                                    <?php else: ?>
                                        Private
                                    <?php endif; ?>  
                                </strong></p>
                                
                                <p>Created At: <strong><?= $value->created_at ?></strong></p>
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
</script> 
