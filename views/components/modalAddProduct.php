<div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProductLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddProductLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddProduct" action="POST" class="needs-validation" novalidate>
                    <input type="hidden" id="numberAdd" value="">
                    
                    <label for="sku" class="form-label">Sku</label>
                    <input type="text" id="skuAdd" name="sku" class="form-control" placeholder="4225-776-3234" required/>
                    
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="nameAdd" name="name" class="form-control"
                        placeholder="Camisa manga larga" required/>

                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" id="quantityAdd" min="1" value="1" name="quantity" class="form-control"
                        placeholder="1" required/>

                    <label for="price" class="form-label">Price</label>
                    <input type="number" id="priceAdd" name="price" class="form-control" placeholder="250.00" required/>

                    <label for="price" class="form-label">Discount</label>
                    <input type="number" id="discountAdd" step="0.01" name="discount" velue="0.00" placeholder='0.00' class="form-control" />

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btnSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>