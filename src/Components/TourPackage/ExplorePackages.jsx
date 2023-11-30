import { tourOffers } from "../../Data/Offers";
import BackgroundSection from "../Common/BackgroundSection";
import TitleComponent from "../Common/TitleComponent";
import SliderOne from "./SliderOne";

const ExplorePackages=({type})=>{
    return (
      <BackgroundSection
      titleClass={"section-b-space deals ratio3_2"}
      imgWidth={0}
      imgHeight={0}
      position={"center"}
    >
      <div className="tourSection ratio_90">
        <div className="container tour-trending-title">
          <div className="row">
            <div className="col-12">
            <TitleComponent title={"New Offer"} subTitle={"most popular destinations"} span={type} titleClass={"title-3 "} />
              <SliderOne slideClass="slider-4 no-arrow" tourData={tourOffers} classTitle="tourBox" />
            </div>
          </div>
        </div>
      </div>
    </BackgroundSection>
      );
}

export default ExplorePackages;