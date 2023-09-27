<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
  </head>
  <body>
    <div class="px-3 mt-2">
    <h3 class="text-center rounded-3 py-2 bg-info bg-opacity-25 text-white">Product CRUD</h3>
    </div>
   
    <div class="container">
      <button  data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary mt-2 mb-3">Add New Product <i class="bi bi-bag-plus"></i></button>
    <table id="dataTable" 
          data-toggle="table" 
          data-search="true" 
          data-pagination="true"
          data-side-pagination="client" 
          data-page-list="[5,10,25,50,100,All]">
      <thead class="table-primary">
        <tr>
          <th>ProductName</th>
          <th>ProductDescription</th>
          <th>ProductCategory</th>
          <th>ProductQuantity</th>
          <th>ProductPrice</th>
          <th>ProductAction</th>
        </tr>
      </thead>
      <tbody>
        <?php if($products): ?>
        <?php foreach($products as $product): ?>
          <tr>
          <td><?php echo $product['ProductName']; ?></td>
          <td><?php echo $product['ProductDescription']; ?></td>
          <td><?php echo $product['ProductCategory']; ?></td>
          <td><?php echo $product['ProductQuantity']; ?></td>
          <td><?php echo $product['ProductPrice']; ?></td>
          <td class="d-flex gap-2"><a  class="btn btn-danger" href="<?php echo base_url('delete-product/').$product['Id'];?>"><i class="bi bi-trash"></i></a><button data-bs-toggle="modal" data-bs-target="#edit<?php echo $product['Id'];?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></td>
        </tr>
        <div class="modal fade" id="edit<?php echo $product['Id'];?>">
        <div class="modal-dialog">
          <form method="post" action="<?= site_url('/update-product')?>">
          <input class="form-control" name="p-id" type="hidden" value="<?php echo $product['Id']; ?>">
          <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 was-validated">
                        <label class="mb-2 fw-bolder">Product Name</label>
                        <input required class="form-control"  name="p-name" placeholder="enter here.." value="<?php echo $product['ProductName']; ?>">
                    </div>
                    <div class="mb-3 was-validated">
                        <label class="mb-2 fw-bolder">Product Description</label>
                        <input required class="form-control"  name="p-description" placeholder="enter here.." value="<?php echo $product['ProductDescription']; ?>">
                    </div>
                    <div class="mb-3 was-validated">
                        <label class="mb-2 fw-bolder">Product Category</label>
                        <input required class="form-control"  name="p-category" placeholder="enter here.." value="<?php echo $product['ProductCategory']; ?>">
                    </div>
                    <div class="mb-3 was-validated">
                        <label class="mb-2 fw-bolder">Product Quantity</label>
                        <input required class="form-control" name="p-quantity" type="number" placeholder="enter here.." value="<?php echo $product['ProductQuantity']; ?>">
                    </div>
                    <div class="mb-3 was-validated">
                        <label class="mb-2 fw-bolder">Product Price</label>
                        <input required class="form-control" name="p-price" type="number" placeholder="enter here.." value="<?php echo $product['ProductPrice']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                  <button class="btn btn-primary">Save</button>
                </div>
            </div>
          </form>
            
        </div>
    </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
    <div class="modal fade" id="add">
        <div class="modal-dialog">
          <form method="post" action="<?= site_url('/add-product')?>">
            <div class="modal-content">
                  <div class="modal-header">
                      <h5>Add Product</h5>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3 was-validated">
                          <label class="mb-2 fw-bolder">Product Name</label>
                          <input class="form-control" required name="p-name" placeholder="enter here..">
                      </div>
                      <div class="mb-3 was-validated">
                          <label class="mb-2 fw-bolder">Product Description</label>
                          <input required class="form-control" name="p-description"placeholder="enter here..">
                      </div>
                      <div class="mb-3 was-validated">
                          <label class="mb-2 fw-bolder">Product Category</label>
                          <input required class="form-control" name="p-category" placeholder="enter here..">
                      </div>
                      <div class="mb-3 was-validated">
                          <label class="mb-2 fw-bolder">Product Quantity</label>
                          <input required type="number"class="form-control" name="p-quantity" placeholder="enter here..">
                      </div>
                      <div class="mb-3 was-validated">
                          <label class="mb-2 fw-bolder">Product Price</label>
                          <input required type="number" class="form-control" name="p-price" placeholder="enter here..">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
          </form>
           
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
  </body>
</html>