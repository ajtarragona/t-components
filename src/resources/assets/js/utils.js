

_d = function(...args) {
    // args.forEach(arg => {
    //     console.log(Alpine.raw(arg));
    // });

    var args=args.map((arg)=>{
        return Alpine.raw(arg);
    });

    console.log(...args);
}