import Slider from "react-slick";
import BackgroundDiv from "../Offers/BackgroundDiv";
import BackgroundSection from "../../Common/BackgroundSection";
import TitleComponent from "../../Common/TitleComponent";

const CabOffers = () => {
  const dealBookingData = [
    {
      id: 1,
      title: "Delhi-Agra ",
      price: "3500",
      img: "/assets/images/cab/video-image.jpg",
    },
    {
      id: 2,
      title: "Delhi-Jaipur ",
      price: "4200",
      img: "/assets/images/cab/1.jpg",
    },
    {
      id: 3,
      title: "marseille",
      price: "102",
      img: "/assets/images/cab/2.jpg",
    },
    {
      id: 1,
      title: "marseille",
      price: "102",
      img: "/assets/images/cab/1.jpg",
    },
  ];
  const slide = {
    adaptiveHeight: true,
    // centerMode: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    // centerMode: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };
  return (
    <BackgroundSection
      titleClass={"section-b-space deals ratio3_2"}
      img={"/assets/images/cab/app-bg.jpg"}
      imgWidth={0}
      imgHeight={0}
      position={"center"}
    >
      <div className="container-fluid p-0">
        <TitleComponent
          titleClass="title-1"
          title={"new"}
          subTitle={"Deals On Booking"}
          h2Class="text-white"
        />
        <div className="row">
          <div className="col">
            <Slider {...slide} className="slide-3 no-arrow">
              {dealBookingData.map((data, index) => (
                <div key={index}>
                  <div className="deals-box row" >
                    <div
                      className="left-portion col"
                      
                    >
                      <div className="deals-content">
                        <div className="detail">
                          <h3>{data.title}</h3>
                          <h2>
                            ₹{data.price} <span> / One Way</span>
                          </h2>
                        </div>
                        <img
                          src="/assets/images/barcode.png"
                          alt=""
                          className="img-fluid  "
                          height={300}
                          width={47}
                        />
                      </div>
                    </div>
                    <BackgroundDiv
                      titleClass="deals-img col bg-size"
                      img={data.img}
                      divImg={data.img}
                      imgHeight={446}
                      imgWidth={297}
                      displayClass="none"
                    />
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

export default CabOffers;
