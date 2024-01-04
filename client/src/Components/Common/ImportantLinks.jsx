import { TravelLinks } from "../../Data/Links";
import BackgroundSection from "./BackgroundSection";
import SliderSix from "./SliderSix";
import TitleComponent from "./TitleComponent";

const ImportantLinks = () => {
  return (
    <BackgroundSection
      titleClass={"section-b-space deals ratio3_2"}
      imgWidth={0}
      imgHeight={0}
      position={"center"}
    >
      <div className="menu-section">
        <div className="container tour-trending-title default-flight-slider">
          <TitleComponent
            titleClass="title-3"
            title={"Rica"}
            subTitle={"Amazing Holiday Packages"}
            span="tours"
          />
          <div className="row">
            <div className="col">
              <SliderSix slideData={TravelLinks} />
            </div>
          </div>
        </div>
      </div>
    </BackgroundSection>
  );
};

export default ImportantLinks;
