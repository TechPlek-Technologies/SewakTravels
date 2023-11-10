import { useState } from "react";
import BackgroundSection from "../../../Common/BackgroundSection";
import VideoModal from "./VideoModal";

const Video= () => {
    const [modal, setModal] = useState(false);
    const toggle = () => setModal(!modal);
  
    return (
      <>
        <BackgroundSection titleClass="video-section parallax-img" img="/assets/img/homevideo.png" imgWidth={1905} imgHeight={548} position="center">
          <div className="container">
            <div className="row">
              <div className="col">
                <div className="basic-section">
                  <h2>{"Relax And Enjoy"}</h2>
                  <h4>{"Something Catchy"}</h4>
                  <div className="video-icon" onClick={toggle}>
                    <span />
                    <div className="animation-circle-inverse">
                      <i />
                      <i />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </BackgroundSection>
        <VideoModal modal={modal} toggle={toggle} />
      </>
    );
  };
  
  export default Video;
  