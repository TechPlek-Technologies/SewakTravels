import BodyContent from "./BodyContent";

const ContentPage = ({ slideData, view }) => {
    
    return (
      <>
       <div className={`row ${view === "creative" || view === "list" ? "blog-list" : ""}`}>
          {slideData.map((items,index) => (
            <div className={"col-12"} key={index}>
              <BodyContent data={items} view={view} />
            </div>
          ))}
        </div>
       
  
      </>
    );
  };
  
  export default ContentPage;