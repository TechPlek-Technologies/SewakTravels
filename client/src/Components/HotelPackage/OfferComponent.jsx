import { HotelOffers } from "../../Data/Offers";
import TitleComponent from "../Common/TitleComponent";
import SliderOne from "../TourPackage/SliderOne";

const OfferComponent = () => {
    const slide5 = {
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 586,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      };
  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        <TitleComponent
          title={"Top Offers"}
          subTitle={"Super Easy Booking"}
          span={"Hotel Booking"}
          titleClass={"title-3 "}
        />

        <div className="row">
          <div className="col tourSection ratio3_2">
            <SliderOne
              tourData={HotelOffers}
              classTitle="tourBox wow zoomIn"
              slideClass="flight-5 no-arrow"
              slideCom={slide5}
            />
          </div>
        </div>
      </div>
    </section>
  );
};

export default OfferComponent;
