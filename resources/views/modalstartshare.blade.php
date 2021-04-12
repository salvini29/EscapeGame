<div class="modal fade" id="modalstartshare">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Elija una opcion:</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sendFriend')}}"  method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mail de amigo:</label>
                        <input type="email" class="form-control" id="friend_mail" aria-describedby="emailHelp" name="friend_mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Codigo de la sala:</label>
                        <input type="text" class="form-control" name="sendCode" id="sendCode" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <hr>
                <form action="{{route('startRoom')}}" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="sendCode" id="sendCode" value="">
                    <button type="submit" class="btn btn-success">Empezar sala</button>
                </form>
            </div>
        </div>
    </div>
</div>