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
                <a href="{{ route('paypalpay') }}"><img src="{{ asset('roomimg/PayPalbutton2.png') }}" alt=""></a>
                
                @php
                    $ip = 'xx.xx.xx.xx';
                    $data = \Location::get($ip);
                @endphp
                @if ( $data->countryName == "Argentina" )
                    <a href="{{ route('mercadopago') }}"><img src="{{ asset('roomimg/Mercadopagobutton.png') }}" alt=""></a>
                @else
                    <a href="{{ route('stripepay') }}"><img src="{{ asset('roomimg/Stripebutton.png') }}" alt=""></a>
                @endif    

            </div>
            <br>
        </div>
    </div>
</div>