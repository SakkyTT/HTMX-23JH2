const Counter = () => {
    let count = 0;
    function incr(){
        count = count + 1;
    }
  return (
    <div>
      <div>Count: {count}</div>
      <button onClick={incr}>Increment count</button>
    </div>
  )
}
export default Counter
