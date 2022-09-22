<style>


/*:::Boton-Modal:::*/
.boton-modal{
    padding: 40px;
    background-color: #fff;
}
.boton-modal label{
    padding: 10px 15px;
    background-color: #5488a3;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: all 300ms ease;
}
.boton-modal label:hover{
    background-color: #185E83;
}
/*:::Fin Boton-Modal:::*/

/*:::Ventana Modal:::*/
#btn-modal{
    display: none;
}
.container-modal{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0; left: 0;
    background-color: rgb(144, 148, 150);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 100;
}
#btn-modal:checked ~ .container-modal{
    display: flex;
}
.content-modal{
    width: 80%;
    padding: 20px;
    background-color: rgba(100, 230, 47, 0.7);
    border-radius: 4px;
    
}
.content-modal h1{
    margin-bottom: 15px;
    color: white;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.content-modal p{
    padding: 15px 0px;
    border-top: 1px solid #dbdbdb;
    border-bottom: 1px solid #dbdbdb;
}
.content-modal .btn-cerrar{
    width: 100%;
    margin-top: 15px;
    display: flex;
    justify-content: flex-end;
}
.content-modal .btn-cerrar label{
    padding: 7px 10px;
    background-color: #5488a3;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: all 300ms ease;
}
.content-modal .btn-cerrar label:hover{
    background-color:#185E83;
}


/*:::Fin Ventana Modal:::*/
</style>

<!--Ventana Modal-->
<div id="btn-modal">
    <div class="container-modal">
        <div class="content-modal">
            <h3>Nuevo Usuario</h3>
           <div class="card">
            <form action="" method="get">
                <div class="form-group">
                  <label for="">Usuario</label>
                  <input type="text" class="form-control" name="usuario" id="" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="text" class="form-control" name="pass" id="" placeholder="Contraseña">
                </div>
                <div class="form-group">
                  <input class="btn btn-primary btn-block" type="submit" class="form-control" name="nuevo" id="" value="Registrar">
                </div>
            </form>
           </div>           
        </div>
        
    </div>
</div>
<!--Fin de Ventana Modal-->