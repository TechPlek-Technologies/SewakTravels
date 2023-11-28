import { Link } from "react-router-dom";
import Slider from "react-slick";
import Img from "../../../Common/Img";

const InstaSlider = ({ instagramData }) => {

    const slide6 = {
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1367,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 5,
              infinite: true,
            },
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
        ],
      };
    return (
      <div className="slide-6 no-arrow">
        <Slider {...slide6}>
          {instagramData.map((image,index) => (
            <div key={index}>
              <Link to="https://www.instagram.com/sewaktravelsservice" target="_blank">
                <div className="instagram-box">
                  <Img src={image.src} alt="" className="img-fluid bg-img" />
                  <div className="overlay">
                    <i className="fab fa-instagram"></i>
                  </div>
                </div>
              </Link>
            </div>
          ))}
        </Slider>
      </div>
    );
  };
  
  export default InstaSlider;