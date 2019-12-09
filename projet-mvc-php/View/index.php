<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <title>Nom du site</title>
        <meta name="description" content="">
        <link href="../View/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="../View/js/bootstrap.min.js"></script>
        <script src="../View/js/jquery.min.js"></script>
    </head>
    <body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left"> 
                        <h3>Bienvenue</h3>
                        <p>Gère tes entreprises !</p>
                        <input type="submit" name="" value="Modifier"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Structure</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Secteur</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Ajoute une structure !</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nom *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Rue *" value="" />
                                        </div>
                                       <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Code Postale *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Ville *" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Est associé *" value="" />
                                        </div>
                                       <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Nombre de donnateurs *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Nombre d'actionnaires *" value="" />
                                        </div>
                                            <input type="submit" class="btnRegister"  value="Ajouter"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Ajouter un secteur !</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Libelle *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </body>
</html>