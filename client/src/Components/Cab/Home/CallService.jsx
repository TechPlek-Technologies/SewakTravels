import TitleComponent from "../../Common/TitleComponent";
import AboutDetails from "../CallService/AboutDetails";
import CabAnimation from "../CallService/CabAnimation";

const CallService=() => {
    const aboutImgBoxData = [
  {
    id: 1,
    img: "/assets/images/mix/emergency/1.webp",
    title: "01",
  },
  {
    id: 2,
    img: "/assets/images/mix/emergency/2.webp",
    title: "02",
  },
];
    return (
      <section className="section-b-space animated-section about-section">
        <CabAnimation />
        <div className="container">
          <TitleComponent title={"new"} subTitle={"Emergency Call"} span={"Call Service"} titleClass={"title-3"} />
         
          <div className="row">
            <div className="col-lg-7">
              <div className="image-section">
                {aboutImgBoxData.map((data,index) => (
                  <div className="img-box" key={index}>
                    <img src={data.img}  className="img-fluid " alt="" width={375} height={365} />
                    <div className="no-class">
                      <h3>{data.title}</h3>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            <div className="col-lg-5">
              <AboutDetails />
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default CallService;