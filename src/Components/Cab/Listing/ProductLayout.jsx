import CabListProducts from "./CabListProducts";

function ProductLayout({ value,validate,isValid }) {
  const showProduct = value;
  return (
    <>
      <div
        className={`product-wrapper-grid special-section grid-box list-view `}
      >
        <div className={` list-view`}>
          <CabListProducts data={showProduct} validate={validate} isValid={isValid} />
        </div>
      </div>
    </>
  );
}

export default ProductLayout;
