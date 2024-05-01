import { useState } from "react";
import BackgroundSection from "../../Common/BackgroundSection";
import VideoModal from "../../Common/VideoModal";
import CabFrom from "./CabFrom";

const VideoBanner1 = () => {
  const [modal, setModal] = useState(false);
  const toggle = () => setModal(!modal);
  return (
    <>
      <BackgroundSection img="/assets/images/mix/video-bg.jpg" imgHeight={741} imgWidth={2453} titleClass="video_section parallax-img" position="center">
        <CabFrom/>
      </BackgroundSection>
      <VideoModal modal={modal} toggle={toggle} />
    </>
  );
};

export default VideoBanner1;
