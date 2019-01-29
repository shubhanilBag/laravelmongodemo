<div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Customer Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" ng-model="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Customer Address</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" ng-model="address"></textarea>
  </div>
  <div class="alert alert-success" role="alert" ng-if="bknd_response">
  @{{bknd_response}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-primary mb-2" ng-click="addCustomer()" ng-disabled="isWaiting">Add Customer</button>
  </div>
</div>
<hr />