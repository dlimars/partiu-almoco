<div class="modal fade" id="restaurant-voting">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Selecione abaixo o restaurante que deseja almoçar hoje</h4>
      </div>
      <div class="modal-body">
          <div class="row">
            @foreach(range(1, 9) as $num)
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="/assets/img/restaurants/restaurant_1.jpg">
                    <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p>
                      <a href="#" class="btn btn-primary" role="button">
                        Escolher
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                      </a>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->