<div class="modal fade" id="modalpay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Medios de pago:</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <br>
            <div class="modal-body">
                <a href="{{ route('paypalpay') }}"><img src="assets/images/PayPalbutton2.png" alt=""></a>
                
                @php
                    //$ipreal = \Request::ip(); //Esto si lo saco a produccion y quisiese la ip real del cliente
                    $ip = '200.86.0.10'; //IP DE CHILE
                    //$ip = '190.246.252.118'; //IP ARGENTINA
                    $data = \Location::get($ip);
                @endphp
                @if ( $data->countryName == "Argentina" )
                    <a href="/test"><img src="assets/images/Mercadopagobutton.png" alt=""></a>
                @else
                    <a href="{{ route('stripepay') }}"><img src="assets/images/Stripebutton.png" alt=""></a>
                @endif
            </div>
            <br>
            {{-- <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div> --}}
        </div>
    </div>
</div>