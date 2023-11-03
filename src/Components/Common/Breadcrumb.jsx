import { Link } from "react-router-dom";
import Img from "./Img";

const Breadcrumb = ({
  title,
  subTitle,
  bannerImg,
  mainTitle,
  animation,
  class1,
  class2,
  videoPath,
}) => {
  return (
    <section className={`breadcrumb-section pt-0 ${class1 && class1}`}>
      {videoPath ? (
        <video
          autoPlay
          muted
          loop
          id="block"
          className="bg-video"
          style={{ width: "100%" }}
        >
          <source src={videoPath} type="video/mp4" />
        </video>
      ) : (
        <Img src={bannerImg} className="bg-img" alt="" />
      )}

      <div className={`breadcrumb-content ${class2 && class2}`}>
        <div>
          {mainTitle ? <h2>{mainTitle}</h2> : <h2>{subTitle}</h2>}
          <nav aria-label="breadcrumb" className="theme-breadcrumb">
            <ol className="breadcrumb">
              <li className="breadcrumb-item">
                <Link href="/">{title}</Link>
              </li>
              <li className="breadcrumb-item active" aria-current="page">
                {subTitle}
              </li>
              {mainTitle && (
                <li className="breadcrumb-item active" aria-current="page">
                  {mainTitle}
                </li>
              )}
            </ol>
          </nav>
        </div>
      </div>
    </section>
  );
};

export default Breadcrumb;
