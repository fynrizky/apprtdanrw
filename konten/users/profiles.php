<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-black-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h1 id="myModalLabel" class="text-center">My Profile</h1>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
          	<div class="row">
              <div class="col-md-4"><br><hr></div>
              <div class="col-xs-4"><img src="https://pbs.twimg.com/profile_images/3663020003/d09fae59ab68605a7973043e0267b905_400x400.jpeg" class="img-thumbnail img-responsive img-circle"></div>
              <div class="col-md-4"><br><hr></div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
              	
              <h3 class="text-center"><?php echo ucfirst($_SESSION['adm']['level'] == 1 ? 'Sekertaris RW' : ($_SESSION['adm']['level'] == 2 ? 'RW' : 'RT')); ?></h3>
                               
              <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, fuga illum. 
              Illum, aperiam architecto libero a voluptas, sint quaerat soluta facere necessitatibus adipisci iste, nobis omnis eligendi officiis quis voluptatibus.
              <h3 class="text-center"><a href="https://www.instagram.com/kykyrizky__/" class="btn btn-instagram btn-flat">My Gallery</a></h3>
                <hr>
              <p class="text-center">
                <a href="#"><i class="fa fa-twitter-square fa-fw fa-3x"></i></a> &nbsp;
                <a href="#"><i class="fa fa-facebook-square fa-fw  fa-3x"></i></a> &nbsp;
                <a href="#"><i class="fa fa-instagram fa-fw  fa-3x"></i></a>
              </p>
                
              </div>
              <div class="col-md-1"></div>
            </div><!--/row-->
          </div><!--/container-->
        </div>
        <div class="modal-footer bg-black-gradient">
            <button class="btn btn-lg btn-default center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
        </div>
    </div>
    </div>
  </div><!--/modal-->

<!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->