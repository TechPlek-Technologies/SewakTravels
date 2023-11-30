import { Link } from "react-router-dom";
import { tabs } from "../../Data/FaqContent";

const TitleComponent = ({ title, subTitle, titleClass, span, h2Class }) => {
  return (
    <div className="">
      <div className={titleClass}>
        <h2 className={`${h2Class && h2Class}`}>
          {subTitle}
          {span && <span>{"offers"}</span>}
        </h2>
      </div>
    
    </div>
  );
};

export default TitleComponent;
