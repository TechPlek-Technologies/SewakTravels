import CabListProducts from "./CabListProducts";

function ProductLayout({data, value,validate,isValid,rentals }) {
  const showProduct = value;
  return (
    <>
      <div
        className={`product-wrapper-grid special-section grid-box list-view `}
      >
        <div className={` list-view`}>
          <CabListProducts journey={data} data={showProduct} validate={validate} isValid={isValid} rentals={rentals} />
        </div>
      </div>
    </>
  );
}

export default ProductLayout;
