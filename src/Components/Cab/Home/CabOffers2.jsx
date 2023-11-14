import Slider from "react-slick";
import Img from "../../Common/Img";
import { Link } from "react-router-dom";

const CabOffers2 = () => {
  const offers = [
    {
      id: 1,
      src: "/assets/images/hotel/gallery/1.jpg",
      title: "2 nights gateway promotion package",
      btn: "Book now",
      price:2000
    },
    {
      id: 2,
      src: "/assets/images/hotel/gallery/2.jpg",
      title: "2 nights gateway promotion package",
      btn: "Book now",
      price:2000
    },
    {
      id: 3,
      src: "/assets/images/hotel/gallery/3.jpg",
      title: "2 nights gateway promotion package",
      btn: "Book now",
      price:2000
    },
    {
      id: 4,
      src: "/assets/images/hotel/gallery/4.jpg",
      title: "2 nights gateway promotion package",
      btn: "Book now",
      price:2000
    },
    {
      id: 5,
      src: "/assets/images/hotel/gallery/5.jpg",
      title: "2 nights gateway promotion package",
      btn: "Book now",
      price:3000
    },
  ];
  const slide4 = {
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
  return (
    <section className={`ratio3_2 pt-0`}>
      <div className="container-fluid ">
        {/* <TitleComponent title={"Our"} subTitle={"Offers"} span={"Offers"} titleClass={"title-3"} /> */}
        <div className="row">
          <div className="col p-0">
            <div className="slide-4 no-arrow">
              <Slider {...slide4}>
                {offers.map((image,index) => (
                  <div key={index}>
                    <div className="gallery-box">
                      <div className="gallery-img">
                        <div className="overlay"></div>
                        <Img src={image.src} alt="" className="img-fluid bg-img" />
                      </div>
                      <div className="gallery-content">
                        <h5>{image.title}</h5>
                        <h5>From ₹{image.price}</h5>
                        <Link href="/pages/portfolio/grid-2-title" className="btn btn-solid">{image.btn}</Link>
                      </div>
                    </div>
                  </div>
                ))}
              </Slider>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default CabOffers2;
