import CopyRightFooter from "./Footer/CopyRightFooter";
import FooterContent from "./Footer/FooterContent";

const FooterComponent= ({ place, footerClass }) => {
    return (
      <footer className={`${footerClass && footerClass}`}>
        <FooterContent />
        <CopyRightFooter />

      </footer>
    );
  };
  
  export default FooterComponent;