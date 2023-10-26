const BackgroundSection= ({ children, img, titleClass, imgHeight, imgWidth, position, video }) => {
    return (
      <section
        className={titleClass}
        style={{
          backgroundImage: `url(${img})`,
          backgroundSize: "cover",
          backgroundPosition: `${position}`,
          backgroundRepeat: "no-repeat",
          display: "block",
        }}>
        {video ? (
          <video autoPlay muted loop id="block" className="bg-video" style={{ width: "100%" }}>
            <source src={img} type="video/mp4" />
          </video>
        ) : (
          <img src={img} className="img-fluid bg-img" alt="" width={imgWidth} height={imgHeight} style={{ display: "none" }} />
        )}
        {children}
      </section>
    );
  };
  
  export default BackgroundSection;