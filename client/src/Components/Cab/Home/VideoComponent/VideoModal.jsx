import { Modal, ModalBody } from "reactstrap";

const VideoModal= ({ modal, toggle }) => {
    return (
      <Modal modalClassName="video-modal" centered size="lg" fade isOpen={modal} toggle={toggle}>
        <ModalBody>
          <button onClick={toggle} type="button" className="btn-close">
            <span>×</span>
          </button>
          <iframe title="youtubeVideo" src="https://www.youtube.com/embed/ezuKIzXJuz8" allowFullScreen></iframe>
        </ModalBody>
      </Modal>
    );
  };
  
  export default VideoModal;