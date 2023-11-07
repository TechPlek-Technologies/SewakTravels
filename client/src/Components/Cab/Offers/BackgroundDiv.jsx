const BackgroundDiv = ({ children, img, titleClass, imgHeight, imgWidth, divImg, displayClass }) => {

    return (
      <div
        className={titleClass}
        style={{
          backgroundImage: `url(${divImg})`,
          backgroundSize: "cover",
          backgroundPosition: "center",
          backgroundRepeat: "no-repeat",
          display: "block",
        }}>
        <img src={img} className="img-fluid bg-img" alt="" width={imgWidth} height={imgHeight} style={{ display: `${displayClass}` }} />
        {children}
      </div>
    );
  };
  
  export default BackgroundDiv;