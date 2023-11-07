import Slider from "react-slick";
import BackgroundSection from "../../Common/BackgroundSection";
import TitleThree from "../Ourvehicle/TitleThree";
import { Link } from "react-router-dom";
import { carData } from "../../../Data/CabData"; 

const OurVehicleComponent= () => {
  const slide = {
    infinite: false,
    speed: 300,
    slidesToShow: 4,
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
  const symbol = "₹";
    return (
      <BackgroundSection titleClass={"section-b-space dark-cls category-bg"} img={"/assets/images/cab/grey-bg.jpg"} imgWidth={0} imgHeight={0} position={""}>
        <div className="container">
          <TitleThree classTitle="title-1" title={"New"} subTitle={"Our Vehicle"} />
          <div className="row">
            <div className="col">
              <Slider {...slide} className="slider-4 arrow-classic">
                {carData.map((data,index) => (
                  <div key={index}>
                    <div className="category-block">
                      <div className="category-img">
                        <img src={data.img} alt="" className="img-fluid   " />
                      </div>
                      <h6>
                        Starts from{" "}
                        <span>
                          {symbol}
                          {( data.price).toFixed(0)} / day
                        </span>
                      </h6>
                      <h4>{data.cabType}</h4>
                      <h5>{data.desc}</h5>
                      <Link href="/cab/booking" className="btn btn-lower btn-curve">
                        {"Book"} {symbol}
                        {( data.price).toFixed(0)}
                      </Link>
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
  
  export default OurVehicleComponent;