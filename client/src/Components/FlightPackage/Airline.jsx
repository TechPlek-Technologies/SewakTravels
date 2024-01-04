import Slider from "react-slick";
import TitleComponent from "../Common/TitleComponent";
import { flightOffers } from "../../Data/Offers";
import { Link } from "react-router-dom";
import Button from "../Common/Button";

const Airline = ({ type }) => {
  const slide4 = {
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
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
    <section className=" detail-section no-bg-detail category-wrapper  section-b-space deals ratio3_2">
      <div className="xs-section">
        <div className="container-fluid container">
          <TitleComponent
            title={"New Offer"}
            subTitle={"never miss popular deals"}
            span={type}
            titleClass={"title-3 "}
          />
          <Slider {...slide4} className="slider-4">
            {flightOffers.map((data, index) => (
              <div key={index}>
                <div className="detail-box">
                  <div className="upper-part">
                    <h6>{data.title}</h6>
                    <h2>{data.desc}</h2>
                    <h5>enjoy extra baggage allowance</h5>
                  </div>
                  <Link href="/pages/other-pages/contact-us-1">
                    <Button
                      btnClass="btn btn-rounded btn-sm color1"
                      name={"Read More"}
                    />
                  </Link>
                </div>
              </div>
            ))}
          </Slider>
        </div>
      </div>
    </section>
  );
};

export default Airline;
