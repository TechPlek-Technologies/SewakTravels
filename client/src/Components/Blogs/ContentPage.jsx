import BodyContent from "./BodyContent";

const ContentPage = ({ slideData, view }) => {
  // console.log(slideData)
  return (
    <>
      <div
        className={`row ${
          view === "creative" || view === "list" ? "blog-list" : ""
        }`}
      >
        {slideData?.map((items, index) => {
          if (index === 0) {
            return "";
          } else {
            return (
              <div className={"col-12"} key={index}>
                <BodyContent data={items} view={view} />
              </div>
            );
          }
        })}
      </div>
    </>
  );
};

export default ContentPage;
