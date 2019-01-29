<div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Customer Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" ng-model="name_input">
  </div>
  <div class="form-group" ng-if="address">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@{{name}}</h5>
            <p class="card-text" ng-bind-html="address"></p>
        </div>
    </div>
  </div>
  <div class="alert alert-success" role="alert" ng-if="bknd_response">
  @{{bknd_response}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-primary mb-2" ng-click="searchCustomer()" ng-disabled="isWaiting">Search Customer</button>
  </div>
</div>
<hr />