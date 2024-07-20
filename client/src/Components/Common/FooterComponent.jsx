import CopyRightFooter from "./Footer/CopyRightFooter";
import FooterContent from "./Footer/FooterContent";
import FooterLocation from "./Footer/FooterLocation";

const FooterComponent= ({ place, footerClass }) => {
    return (
      <footer className={`${footerClass && footerClass}`}>
        <FooterContent />
        <FooterLocation/>
        <CopyRightFooter />

      </footer>
    );
  };
  
  export default FooterComponent;