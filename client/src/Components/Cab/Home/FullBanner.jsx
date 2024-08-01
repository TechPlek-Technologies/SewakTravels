import BackgroundSection from "../../Common/BackgroundSection";
import BannerContent from "../../Common/BannerContent";


const FullBanner = () => {
  return (
    <BackgroundSection img="/assets/images/background.webp" imgWidth={1920} imgHeight={600} titleClass="full-banner" position="center">
      <div className="container">
        <div className="row">
          <div className="offset-xl-7 col-xl-5 col-lg-6 offset-lg-6 col-md-7 offset-md-5">
            <BannerContent/>
          </div>
        </div>
      </div>
    </BackgroundSection>
  );
};

export default FullBanner;
