const TextSplit= ({ text }) => {
    return (
      <div>
        {text.split("").map((char, index) => (
          <span key={index}>{char}</span>
        ))}
      </div>
    );
  };
  
  export default TextSplit;