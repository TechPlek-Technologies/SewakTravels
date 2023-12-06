function Button({ btnClass, name, handleButtonClick, isValid }) {
  return (
    <>
      <button
        disabled={isValid ? false : true}
        onClick={handleButtonClick}
        className={`btn ${btnClass} color1`}
        type="button"
      >
        {name}
      </button>
    </>
  );
}

export default Button;
