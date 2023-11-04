import CabListProducts from "./CabListProducts";

function ProductLayout({ value,validate }) {
  const showProduct = value;
  return (
    <>
      <div
        className={`product-wrapper-grid special-section grid-box list-view `}
      >
        <div className={`row content grid list-view`}>
          <CabListProducts data={showProduct} validate={validate} />
        </div>
      </div>
    </>
  );
}

export default ProductLayout;
