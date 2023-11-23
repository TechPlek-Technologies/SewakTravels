import Slider from "react-slick";
import BackgroundSection from "../../Common/BackgroundSection";
import { Link } from "react-router-dom";
import { cabOffers } from "../../../Data/CabData";
import TitleComponent from "../../Common/TitleComponent";

const OurVehicleOffers = () => {
  const slide = {
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    rows: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          rows: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          rows: 1,
        },
      },

      {
        breakpoint: 586,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          rows: 1,
        },
      },
    ],
  };
  const symbol = "₹";
  return (
    <BackgroundSection
      titleClass={"section-b-space dark-cls category-bg"}
      img={"/assets/images/cab/grey-bg.jpg"}
      imgWidth={0}
      imgHeight={0}
      position={""}
    >
      <div className="container">
        <TitleComponent
          title={"New"}
          subTitle={"Offers"}
          span={"Cab Offers"}
          titleClass={"title-3"}
        />

        <div className="row">
          <div className="col">
            <Slider {...slide} className="slider-4 arrow-classic">
              {cabOffers.map((data, index) => (
                <div key={index}>
                  <div className="category-block">
                    <div className="category-img">
                      <img src={data.img} alt="" className="img-fluid   " />
                    </div>
                    <div>
                      <h6>
                        Now Grab up to <span>{data.offer} off</span>
                      </h6>
                      <h5>{data.desc}</h5>
                      <div className="offerButton">
                      <Link
                        href="/cab/booking"
                        className="btn btn-lower btn-curve"
                      >
                        {"Book"} {symbol}
                        {data.price.toFixed(0)}
                      </Link>
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </Slider>
          </div>
        </div>
      </div>
    </BackgroundSection>
  );
};

export default OurVehicleOffers;
